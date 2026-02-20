import axios from "axios";

const api = axios.create({
  baseURL: "http://127.0.0.1:8000/api/",
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
});

// request interceptor para adicionar o token de autenticação em cada requisição
api.interceptors.request.use(
  function (config) {
    const token = localStorage.getItem("lr_api_token");
    if (token && config.headers) {
      config.headers.Authorization = `Bearer ${token}`;
    }

    return config;
  },
  function (error) {
    return Promise.reject(error);
  },
);

// response interceptor para lidar com erros de autenticação
api.interceptors.response.use(
  function (response) {
    return response;
  },
  function (error) {
    if (error.response && error.response.status === 401) {
      localStorage.removeItem("lr_api_token");
    }
    return Promise.reject(error);
  },
);

export default api;
