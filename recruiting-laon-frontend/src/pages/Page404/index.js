import { Link } from "react-router-dom";
import styles from "./styles.module.css";

export default function Page404() {
  return (
    <div className={styles.container}>
      <h1 className={styles.title}>
        <strong>Ops!</strong> Página Não Encontrada{" "}
        <span className={styles.error_badge}>Erro 404</span>
      </h1>
      <p className={styles.subtitle}>
        A página que você está procurando não existe.
      </p>
      <Link to="/" className={styles.link}>
        Voltar para a Página Inicial
      </Link>
    </div>
  );
}
