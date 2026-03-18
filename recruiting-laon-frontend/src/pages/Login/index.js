import FormAuth from "../../components/FormAuth";
import LrButtonPrimary from "../../components/LrButtonPrimary";
import LrInputText from "../../components/LrInputText";
import LrButtonBasic from "../../components/LrButtonBasic";
import LrInputPassword from "../../components/LrInputPassword";
import styles from "./styles.module.css";
import { toast } from "react-toastify";
import { useEffect, useState } from "react";
import { validateEmail } from "../../validators/email.validator";
import { Link, useNavigate } from "react-router-dom";
import { useAuth } from "../../auth/useAuth";

export default function Login() {
  const { login, user } = useAuth();

  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [errors, setErrors] = useState({});
  const [loading, setLoading] = useState(false);

  const navigate = useNavigate();

  useEffect(() => {
    if (user) {
      navigate("/catalogo");
    }
  }, [user, navigate]);

  async function handleSubmit(event) {
    event.preventDefault();

    setLoading(true);

    const newErrors = {};

    if (!email) {
      newErrors.email = "O email é obrigatório.";
    } else if (!validateEmail(email)) {
      newErrors.email = "O email é inválido.";
    }

    if (!password) {
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
      setLoading(false);

      return;
    }

    try {
      await login({ email, password });

      toast.success("Login realizado!");
    } catch (error) {
      const message = error.response?.data?.message || "Erro ao fazer login";

      toast.error(message);
      setLoading(false);
    }

    navigate("/catalogo");

    setLoading(false);
  }

  return (
    <FormAuth variant="login" onSubmit={handleSubmit}>
      <div className="display_flex flex_column gap_24">
        <LrInputText
          className="width_100 color_white"
          placeholder="Email"
          name="email"
          value={email}
          onChange={(event) => setEmail(event.target.value)}
          error={errors?.email}
        />

        <LrInputPassword
          placeholder="Senha"
          name="password"
          value={password}
          onChange={(event) => setPassword(event.target.value)}
          error={errors?.password}
        />
      </div>

      <p className="lr_regular_126 color_gray_500">
        Não possui conta?{" "}
        <Link to="/cadastrar" className={styles.lr_link_register}>
          Cadastre-se agora.
        </Link>
      </p>

      <LrButtonPrimary
        text={loading ? "Entrando..." : "Entrar"}
        disabled={loading}
        type="submit"
      />
    </FormAuth>
  );
}
