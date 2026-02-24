import styles from "./styles.module.css";
import { useLocation, useNavigate } from "react-router-dom";
import LrButtonBack from "../LrButtonBack";
import LrButtonBasic from "../LrButtonBasic";
import SvgLogo from "../SvgLogo";

export default function HeaderAuthContainer() {
  const location = useLocation();
  const navigate = useNavigate();
  return (
    <header className={`${styles.header_container}`}>
      <div className={`${styles.inner_header_container}`}>
        <LrButtonBack onClick={() => navigate("/")} />
        <SvgLogo size="small" />
        {location.pathname === "/entrar" ? (
          <LrButtonBasic
            text="Cadastrar"
            onClick={() => navigate("/cadastrar")}
          />
        ) : (
          <LrButtonBasic text="Entrar" onClick={() => navigate("/entrar")} />
        )}
      </div>
    </header>
  );
}
