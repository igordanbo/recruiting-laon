import FormAuth from "../../components/FormAuth";
import LrButtonPrimary from "../../components/LrButtonPrimary";
import LrInputText from "../../components/LrInputText";
import LrButtonBasic from "../../components/LrButtonBasic";
import LrInputPassword from "../../components/LrInputPassword";
import api from "../../utils/api";
import { toast } from "react-toastify";
import { useState } from "react";
import { validateEmail } from "../../validators/email.validator";
import { validatePassword } from "../../validators/password.validator";
import { useNavigate } from "react-router-dom";

export default function Login() {
  const [dataLogin, setDataLogin] = useState({
    email: "",
    password: "",
  });

  const [errors, setErrors] = useState({});
  const [loading, setLoading] = useState(false);

  const navigate = useNavigate();

  const handleChangeLogin = (event) => {
    const { name, value } = event.target;
    setDataLogin((prev) => ({ ...prev, [name]: value }));
  };

  const handleSubmitLogin = async (event) => {
    event.preventDefault();

    const newErrors = {};

    if (!dataLogin.email) {
      newErrors.email = "O email é obrigatório.";
    } else if (!validateEmail(dataLogin.email)) {
      newErrors.email = "O email é inválido.";
    }

    if (!dataLogin.password) {
      newErrors.password = "A senha é obrigatória.";
    }

    setErrors(newErrors);

    if (Object.keys(newErrors).length > 0) {
      toast.error(
        <div>
          {Object.values(newErrors).map((error, index) => (
            <div key={index}>{error}</div>
          ))}
        </div>,
      );
      return;
    }

    try {
      setLoading(true);

      const response = await api.post("/login", dataLogin);

      const { token, user } = response.data;

      // token
      localStorage.setItem("lr_api_token", token);

      // usuario
      localStorage.setItem("lr_user", JSON.stringify(user));

      toast.success("Login realizado com sucesso.");

      setDataLogin({
        name: "",
        email: "",
        password: "",
      });

      setErrors({});

      navigate("/catalogo");
    } catch (error) {
      console.error(error);

      if (error.response?.status === 422) {
        const apiErrors = error.response.data.errors;

        toast.error(
          <div>
            {Object.values(apiErrors).map((messages, index) =>
              messages.map((msg, i) => <div key={`${index}-${i}`}>{msg}</div>),
            )}
          </div>,
        );

        setErrors(apiErrors);

        return;
      } else if (error.response?.data?.message) {
        toast.error(error.response.data.message);
      } else {
        toast.error("Erro ao fazer login. Tente novamente.");
      }
    } finally {
      setLoading(false);
    }
  };

  return (
    <FormAuth
      title="Login"
      subtitle="Bem vindo(a) de volta!"
      onSubmit={handleSubmitLogin}
    >
      <LrInputText
        className="width_100 color_white"
        placeholder="Email"
        name="email"
        value={dataLogin.email}
        onChange={handleChangeLogin}
      />

      <LrInputPassword
        placeholder="Senha"
        name="password"
        value={dataLogin.password}
        onChange={handleChangeLogin}
      />

      <LrButtonPrimary
        text={loading ? "Entrando..." : "Entrar"}
        disabled={loading}
        type="submit"
      />

      <LrButtonBasic
        className="width_100"
        text={"Cadastrar"}
        type="button"
        onClick={() => navigate("/cadastrar")}
      />
    </FormAuth>
  );
}
