import { useNavigate } from "react-router-dom";
import styles from "./styles.module.css";
import SvgLogo from "../SvgLogo";
import CircleSvg from "../CircleSvg";
import FooterNavLink from "../FooterNavLink";

export default function FooterCatalogContainer({ variant = "catalog" }) {
  const navigate = useNavigate();

  return (
    <footer className={`${styles.footer_container}`}>
      <div className={`${styles.inner_footer_container}`}>
        {variant === "catalog" && (
          <>
            <SvgLogo size="small" />
            <nav className={`${styles.nav_links_footer_container}`}>
              <FooterNavLink to="/catalogo" text="Início" />
              <FooterNavLink to="/" text="Entrar ou Cadastrar" />
              <FooterNavLink to="#termos-e-condicoes" text="Termos e Condições" />
              <FooterNavLink to="#politica-de-privacidade" text="Política de Privacidade" />
              <FooterNavLink to="#ajuda" text="Ajuda" />
            </nav>
            <nav className={`${styles.nav_social_footer_container}`}>
              <CircleSvg
                variant={"facebook"}
                onClick={() => navigate("#facebook")}
              />

              <CircleSvg
                variant={"twitter"}
                onClick={() => navigate("#twitter")}
              />

              <CircleSvg
                variant={"youtube"}
                onClick={() => navigate("#youtube")}
              />
            </nav>
          </>
        )}
      </div>
    </footer>
  );
}
