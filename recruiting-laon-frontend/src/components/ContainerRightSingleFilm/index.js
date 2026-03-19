import { Link } from "react-router-dom";
import { formatDuration } from "../../utils/formatDuration";
import LrButtonSecondary from "../LrButtonSecondary";
import styles from "./styles.module.css";

export default function ContainerRightSingleFilm({
  title,
  originalTitle,
  year,
  duration,
  seasons,
  categories,
  sinopsys,
  cast,
  awards,
  director,
  ratings,
  isFavorite,
  onClickFavorite,
  to,
}) {
  return (
    <div className={` ${styles.container_right_single_film}`}>
      <div className={` ${styles.header_right_single_film}`}>
        <div className={` ${styles.header_right_single_film_content}`}>
          {title && <h1 className="lr_semibold_40">{title}</h1>}

          <div className={` ${styles.header_right_single_film_content_infos}`}>
            {originalTitle && (
              <span className="lr_regular_16">
                <strong>Título original:</strong> {originalTitle}
              </span>
            )}

            {year && (
              <span className="lr_regular_16">
                <strong>Ano:</strong> {year}
              </span>
            )}

            {duration && (
              <span className="lr_regular_16">
                <strong>Duração:</strong> {formatDuration(duration)}
              </span>
            )}

            {seasons && (
              <span className="lr_regular_16">
                <strong>Temporadas:</strong> {seasons}
              </span>
            )}
          </div>
        </div>

        {categories?.length > 0 && (
          <span className={`${styles.container_badges_categories}`}>
            {categories.map((category) => (
              <span className={`${styles.badge_category}`} key={category.id}>
                {category.name}
              </span>
            ))}
          </span>
        )}
      </div>

      <div className={` ${styles.infos_right_mobile_links_single_film}`}>
        <Link
          to={to}
          target="_blank"
          className={`${styles.link_trailer_single_film}`}
        >
          Assistir o Trailer
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

      <div className={` ${styles.infos_right_single_film}`}>
        {sinopsys && (
          <div className={` ${styles.box_info_film}`}>
            <span className={`lr_semibold_16 color_white`}>Sinopse</span>
            <span className="lr_regular_16 color_gray_500">{sinopsys}</span>
          </div>
        )}

        <div className={` ${styles.grid_infos_right_single_film}`}>
          {cast && (
            <div className={` ${styles.box_info_film}`}>
              <span className={`lr_semibold_16 color_white`}>Elenco</span>
              {cast?.length > 0 && (
                <span className={`lr_regular_16 color_gray_500`}>
                  {cast.map((cast) => cast.name).join(", ")}
                </span>
              )}{" "}
            </div>
          )}

          {awards && (
            <div className={` ${styles.box_info_film}`}>
              <span className={`lr_semibold_16 color_white`}>Prêmios</span>
              {awards?.length > 0 && (
                <span className={`lr_regular_16 color_gray_500`}>
                  {awards.map((award) => award.title).join(", ")}
                </span>
              )}{" "}
            </div>
          )}
        </div>

        <div className={` ${styles.grid_infos_right_single_film}`}>
          {director && (
            <div className={` ${styles.box_info_film}`}>
              <span className={`lr_semibold_16 color_white`}>Diretor</span>
              <span className="lr_regular_16 color_gray_500">{director}</span>
            </div>
          )}

          {ratings?.length > 0 && (
            <div className={styles.box_info_film}>
              <span className="lr_semibold_16 color_white">Avaliações</span>

              <div className="lr_regular_16 color_gray_500">
                {ratings.map((rating) => (
                  <div key={rating.id}>
                    {rating.source}: {rating.rating}
                  </div>
                ))}
              </div>
            </div>
          )}
        </div>
      </div>
    </div>
  );
}
