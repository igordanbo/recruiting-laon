import { useNavigate } from "react-router-dom";
import { useRef } from "react";

import CircleSvg from "../CircleSvg";
import styles from "./styles.module.css";

export default function ContainerGrid({
  children,
  variant = "films",
  films,
  description,
  onClickNext = null,
  onClickPrev = null,
  disablePrev,
  disableNext,
}) {
  const navigate = useNavigate();

  const sliderRef = useRef(null);

  const scrollNext = () => {
    sliderRef.current.scrollBy({
      left: 600,
      behavior: "smooth",
    });
  };

  const scrollPrev = () => {
    sliderRef.current.scrollBy({
      left: -600,
      behavior: "smooth",
    });
  };

  return (
    <section className={styles.container_grid}>
      <div className={`d-flex align-items-center justify-content-between`}>
        <p className={styles.container_grid_description}>{description}</p>
        <div className={`d-flex align-items-center gap-2 `}>
          {!disablePrev && (
            <CircleSvg
              variant={"back"}
              onClick={onClickPrev === null ? scrollPrev : onClickPrev}
            />
          )}
          {!disableNext && (
            <CircleSvg
              variant={"next"}
              onClick={onClickNext === null ? scrollNext : onClickNext}
            />
          )}
        </div>
      </div>

      <div
        ref={sliderRef}
        className={`row gap_40 flex-nowrap overflow-auto ${styles.container_grid_films}`}
      >
        {children}
        {films?.map((film) => (
          <div key={film?.id} className="col-auto">
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
