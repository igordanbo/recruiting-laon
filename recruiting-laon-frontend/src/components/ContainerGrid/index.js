import { useNavigate } from "react-router-dom";
import CircleSvg from "../CircleSvg";
import styles from "./styles.module.css";

export default function ContainerGrid({
  children,
  variant = "films",
  films,
  description,
  onClickNext,
  onClickPrev,
  disablePrev,
  disableNext,
}) {
  const navigate = useNavigate();

  return (
    <section className={styles.container_grid}>
      <div className={`d-flex align-items-center justify-content-between`}>
        <p className={styles.container_grid_description}>{description}</p>
        <div>
          {!disablePrev && <CircleSvg variant={"back"} onClick={onClickPrev} />}
          {!disableNext && <CircleSvg variant={"next"} onClick={onClickNext} />}
        </div>
      </div>

      <div className="row g-3">
        {children}
        {films?.map((film) => (
          <div key={film?.id} className="col-6 col-sm-6 col-md-4 col-lg-2">
            <div
              onClick={
                variant === "films"
                  ? () => navigate(`/filmes/filme/${film?.id}`)
                  : () => navigate(`/series/serie/${film?.id}`)
              }
              className={styles.tumb_film_card}
            >
              <img
                src={film?.image_url}
                className="card_img img-fluid"
                alt={film?.title}
              />
              <div className={`${styles.film_info_hover}`}>
                <span className={`${styles.film_name}`}>{film?.title}</span>
                <span className={`${styles.film_play_badge}`}>Assistir</span>
              </div>
            </div>
          </div>
        ))}
      </div>
    </section>
  );
}
