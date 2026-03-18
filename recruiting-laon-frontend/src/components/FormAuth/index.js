import { Link } from "react-router-dom";
import styles from "./styles.module.css";

export default function FormAuth({
  variant,
  title,
  subtitle,
  onSubmit,
  children,
}) {
  return (
    <form className={styles.form_auth} onSubmit={onSubmit}>
      <div className={styles.form_auth_header}>
        {variant === "login" && (
          <>
            <h2 className="lr_semibold_24 color_white">Entrar</h2>
            <p className="lr_regular_16 color_gray_500">
              Bem-vindo de volta!
            </p>
          </>
        )}

        {variant === "register" && (
          <>
            <h2 className="lr_semibold_24 color_white">Cadastre-se</h2>
            <p className="lr_regular_16 color_gray_500">
              Já possui conta? <Link to="/entrar" className={styles.form_auth_link_login}>Acesse aqui.</Link>
            </p>
          </>
        )}
      </div>
      <div className={styles.form_auth_main}>{children}</div>
    </form>
  );
}
