import api from "../api/api";
import web from "../api/web";
import sanctum from "../api/sanctum";

export async function csrf() {
  await sanctum.get("/sanctum/csrf-cookie");
}
export async function login(data) {
  await csrf();

  const response = await web.post("/login", data);

  return response.data;
}

export async function register(data) {
  await csrf();
  const response = await web.post("/register", data);
  return response.data;
}

export async function logout() {
  await api.post("logout");
}

export async function getUser() {
  const response = await api.get("me");
  return response.data;
}
