import FormAuth from "../../components/FormAuth";
import LrButtonPrimary from "../../components/LrButtonPrimary";
import LrInputText from "../../components/LrInputText";
import LrInputPassword from "../../components/LrInputPassword";
import api from "../../utils/api";
import { toast } from "react-toastify";
import { useState } from "react";
import { validateEmail } from "../../validators/email.validator";
import { validateName } from "../../validators/name.validator";
import { validatePassword } from "../../validators/password.validator";
import { useNavigate } from "react-router-dom";
import LrButtonBasic from "../../components/LrButtonBasic";

export default function Register() {
  const [dataRegister, setDataRegister] = useState({
    name: "",
    email: "",
    password: "",
  });

  const [errors, setErrors] = useState({});
  const [loading, setLoading] = useState(false);

  const navigate = useNavigate();

  const handleChangeRegister = (event) => {
    const { name, value } = event.target;
    setDataRegister((prev) => ({ ...prev, [name]: value }));
  };

  const handleSubmitRegister = async (event) => {
    event.preventDefault();

    const newErrors = {};

    if (!dataRegister.name) {
      newErrors.name = "O nome é obrigatório.";
    } else if (!validateName(dataRegister.name)) {
      newErrors.name = "O nome deve ter pelo menos 3 caracteres.";
    }

    if (!dataRegister.email) {
      newErrors.email = "O email é obrigatório.";
    } else if (!validateEmail(dataRegister.email)) {
      newErrors.email = "O email é inválido.";
    }

    if (!dataRegister.password) {
      newErrors.password = "A senha é obrigatória.";
    } else if (!validatePassword(dataRegister.password)) {
      newErrors.password = "A senha deve ter pelo menos 6 caracteres.";
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

      await api.post("/register", dataRegister);

      toast.success(
        "Cadastro realizado com sucesso. Realize o login para acessar a plaraforma.",
      );

      setDataRegister({
        name: "",
        email: "",
        password: "",
      });

      setErrors({});

      navigate("/entrar");
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
        toast.error("Erro ao cadastrar usuário. Tente novamente.");
      }
    } finally {
      setLoading(false);
    }
  };

  return (
    <FormAuth
      title="Cadastre-se"
      subtitle="Acompanhe os melhores filmes e séries."
      onSubmit={handleSubmitRegister}
    >
      <LrInputText
        className="width_100 color_white"
        placeholder="Nome completo"
        name="name"
        value={dataRegister.name}
        onChange={handleChangeRegister}
      />

      <LrInputText
        className="width_100 color_white"
        placeholder="Email"
        name="email"
        value={dataRegister.email}
        onChange={handleChangeRegister}
      />

      <LrInputPassword
        placeholder="Senha"
        name="password"
        value={dataRegister.password}
        onChange={handleChangeRegister}
      />

      <p className="regular_12 color_gray_500">
        Ao clicar em <strong>cadastrar</strong>, você está aceitando os Termos e
        Condições e a Política de Privacidade da Laon.
      </p>

      <LrButtonPrimary
        text={loading ? "Cadastrando..." : "Cadastrar"}
        disabled={loading}
        type="submit"
      />

      <LrButtonBasic
        className="width_100"
        text={"Entrar"}
        type="button"
        onClick={() => navigate("/entrar")}
      />
    </FormAuth>
  );
}
