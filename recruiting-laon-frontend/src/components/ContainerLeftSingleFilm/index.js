import { Link } from "react-router-dom";
import styles from "./styles.module.css";
import LrButtonSecondary from "../LrButtonSecondary";

export default function ContainerLeftSingleFilm({
  src,
  to,
  isFavorite,
  onClickFavorite,
}) {
  return (
    <div className={` ${styles.container_left_single_film}`}>
      <img src={src} />
      <Link
        to={to}
        target="_blank"
        className={`${styles.link_left_single_film}`}
      >
        Assistir o Trailer{" "}
      </Link>

      <LrButtonSecondary
        onClick={onClickFavorite}
        title={"Favoritar"}
        variant="small"
        adicionalClassName={`${styles.link_left_single_film_favorite}`}
        text={
          <>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              height="24px"
              viewBox="0 -960 960 960"
              width="24px"
              fill="#DA954B"
            >
              <path d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143ZM233-120l65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Zm247-350Z" />
            </svg>
            <p> {isFavorite ? "Desfavoritar" : "Favoritar"}</p>
          </>
        }
      ></LrButtonSecondary>
    </div>
  );
}
