import { useNavigate } from "react-router-dom";
import styles from "./styles.module.css";
import LrButtonBack from "../LrButtonBack";
import SvgLogo from "../SvgLogo";

export default function HeaderCatalogContainer({
  variant = "catalog",
  initial_letter = "L",
}) {
  const navigate = useNavigate();

  const user = JSON.parse(localStorage.getItem("lr_user"));

  const initial = user?.name?.charAt(0).toUpperCase();

  return (
    <header className={`${styles.header_container}`}>
      <div className={`${styles.inner_header_container}`}>
        {variant === "catalog" && (
          <>
            <SvgLogo size="small" onClick={() => navigate('/catalogo')}/>
            <div className={styles.header_catalog_options}>
              <svg
                className="svg_button"
                onClick={() => {
                  navigate("/catalogo/busca");
                }}
                width="32"
                height="32"
                viewBox="0 0 32 32"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <circle cx="16" cy="16" r="15.5" stroke="#636177" />
                <g clipPath="url(#clip0_13_14)">
                  <path
                    d="M20.0207 19.078L22.876 21.9326L21.9327 22.876L19.078 20.0206C18.0159 20.8721 16.6947 21.3352 15.3334 21.3333C12.0214 21.3333 9.33337 18.6453 9.33337 15.3333C9.33337 12.0213 12.0214 9.33331 15.3334 9.33331C18.6454 9.33331 21.3334 12.0213 21.3334 15.3333C21.3353 16.6946 20.8722 18.0158 20.0207 19.078ZM18.6834 18.5833C19.5294 17.7132 20.002 16.5469 20 15.3333C20 12.7546 17.9114 10.6666 15.3334 10.6666C12.7547 10.6666 10.6667 12.7546 10.6667 15.3333C10.6667 17.9113 12.7547 20 15.3334 20C16.547 20.0019 17.7133 19.5294 18.5834 18.6833L18.6834 18.5833Z"
                    fill="white"
                  />
                </g>
                <defs>
                  <clipPath id="clip0_13_14">
                    <rect
                      width="16"
                      height="16"
                      fill="white"
                      transform="translate(8 8)"
                    />
                  </clipPath>
                </defs>
              </svg>
              <div className={styles.header_catalog_initial_letter}>
                {initial || initial_letter}
              </div>
            </div>
          </>
        )}

        {variant === "single" && (
          <>
            <LrButtonBack onClick={() => navigate(-1)} />
            <div className={styles.header_catalog_options}>
              <svg
                className="svg_button"
                onClick={() => {
                  navigate("/catalogo/busca");
                }}
                width="32"
                height="32"
                viewBox="0 0 32 32"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <circle cx="16" cy="16" r="15.5" stroke="#636177" />
                <g clipPath="url(#clip0_13_14)">
                  <path
                    d="M20.0207 19.078L22.876 21.9326L21.9327 22.876L19.078 20.0206C18.0159 20.8721 16.6947 21.3352 15.3334 21.3333C12.0214 21.3333 9.33337 18.6453 9.33337 15.3333C9.33337 12.0213 12.0214 9.33331 15.3334 9.33331C18.6454 9.33331 21.3334 12.0213 21.3334 15.3333C21.3353 16.6946 20.8722 18.0158 20.0207 19.078ZM18.6834 18.5833C19.5294 17.7132 20.002 16.5469 20 15.3333C20 12.7546 17.9114 10.6666 15.3334 10.6666C12.7547 10.6666 10.6667 12.7546 10.6667 15.3333C10.6667 17.9113 12.7547 20 15.3334 20C16.547 20.0019 17.7133 19.5294 18.5834 18.6833L18.6834 18.5833Z"
                    fill="white"
                  />
                </g>
                <defs>
                  <clipPath id="clip0_13_14">
                    <rect
                      width="16"
                      height="16"
                      fill="white"
                      transform="translate(8 8)"
                    />
                  </clipPath>
                </defs>
              </svg>
              <div className={styles.header_catalog_initial_letter}>
                {initial || initial_letter}
              </div>
            </div>
          </>
        )}
      </div>
    </header>
  );
}
