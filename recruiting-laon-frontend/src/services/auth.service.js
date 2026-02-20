import axios from "axios";
import { useNavigate } from "react-router-dom";

export async function logout() {
  const token = localStorage.getItem("lr_api_token");
  const navigate = useNavigate();

  try {
    await axios.post(
      "http://127.0.0.1:8000/api/logout",
      {},
      {
        headers: {
          Authorization: `Bearer ${token}`,
          Accept: "application/json",
        },
      },
    );
  } catch (error) {
    // ignora erro
  } finally {
    localStorage.removeItem("lr_api_token");
    navigate("/");
  }
}
