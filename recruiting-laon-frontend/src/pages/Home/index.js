import LrLinkPrimary from "../../components/LrLinkPrimary";
import LrLinkSecondary from "../../components/LrLinkSecondary";
import SvgLogo from "../../components/SvgLogo";
import styles from "./styles.module.css";

export default function Home() {
  return (
    <section className={`${styles.lr_section_home}`}>
      <SvgLogo size="medium" />

      <div className={`${styles.lr_section_home_content}`}>
        <span className={`${styles.lr_section_home_badge}`}>
          Seja bem-vindo
        </span>

        <h1 className={`${styles.lr_section_home_title}`}>
          Sua <strong>plataforma</strong> de streaming <em>favorita</em>.
        </h1>

        <LrLinkPrimary to="/cadastrar" text="Cadastrar" />
        <LrLinkSecondary to="/entrar" text="Entrar" />
      </div>
    </section>
  );
}
