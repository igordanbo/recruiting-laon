import axios from "axios";

const sanctum = axios.create({
  baseURL: "http://localhost:8000",
  withCredentials: true,
});

sanctum.defaults.withXSRFToken = true;

export default sanctum;
