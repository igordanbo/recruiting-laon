import axios from "axios";

const api = axios.create({
  baseURL: "http://localhost:8000/api/",
  withCredentials: true,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
});

api.defaults.withXSRFToken = true;

// request interceptor para adicionar o token de autenticação em cada requisição
api.interceptors.request.use(
  (response) => response,

  (error) => {
    if (error.response?.status === 401) {
      window.location.href = "/entrar";
    }

    return Promise.reject(error);
  },
);

export default api;
