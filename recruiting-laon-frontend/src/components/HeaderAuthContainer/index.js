import { useEffect, useState } from "react";
import { useLocation, useNavigate } from "react-router-dom";
import styles from "./styles.module.css";
import LrButtonBack from "../LrButtonBack";
import LrButtonBasic from "../LrButtonBasic";
import SvgLogo from "../SvgLogo";
import CircleSvg from "../CircleSvg";

export default function HeaderAuthContainer() {
  const location = useLocation();
  const navigate = useNavigate();
  const [isMobile, setIsMobile] = useState(false);

  useEffect(() => {
    if (window.innerWidth < 1000) {
      setIsMobile(true);
    }
  }, []);

  return (
    <header className={`${styles.header_container}`}>
      {isMobile ? (
        <div className={`${styles.inner_header_container}`}>
          <CircleSvg variant={"back"} onClick={() => navigate("/")} />
          <SvgLogo size="small" />
        </div>
      ) : (
        <div className={`${styles.inner_header_container}`}>
          <LrButtonBack onClick={() => navigate("/")} />
          <SvgLogo size="small" />
          {location.pathname === "/entrar" ? (
            <LrButtonBasic
              text="Cadastrar"
              className="width_max_content"
              onClick={() => navigate("/cadastrar")}
            />
          ) : (
            <LrButtonBasic
              className="width_max_content"
              text="Entrar"
              onClick={() => navigate("/entrar")}
            />
          )}
        </div>
      )}
    </header>
  );
}
