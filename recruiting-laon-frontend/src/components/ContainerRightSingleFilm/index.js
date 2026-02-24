import { formatDuration } from "../../utils/formatDuration";
import styles from "./styles.module.css";

export default function ContainerRightSingleFilm({
  title,
  originalTitle,
  year,
  duration,
  categories,
  sinopsys,
  cast,
  awards,
  director,
  ratings,
}) {
  return (
    <div className={` ${styles.container_right_single_film}`}>
      <div className={` ${styles.header_right_single_film}`}>
        {title && <h1 className="lr_semibold_40">{title}</h1>}

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

      <div className={` ${styles.infos_right_single_film}`}>
        {sinopsys && (
          <div className={` ${styles.box_info_film}`}>
            <span className={`semibold_16 color_white`}>Sinopse</span>
            <span className="lr_regular_16 color_gray_500">{sinopsys}</span>
          </div>
        )}

        <div className={` ${styles.grid_infos_right_single_film}`}>
          {cast && (
            <div className={` ${styles.box_info_film}`}>
              <span className={`semibold_16 color_white`}>Elenco</span>
              {cast?.length > 0 && (
                <span className={`lr_regular_16 color_gray_500`}>
                  {cast.map((cast) => cast.name).join(", ")}
                </span>
              )}{" "}
            </div>
          )}

          {awards && (
            <div className={` ${styles.box_info_film}`}>
              <span className={`semibold_16 color_white`}>Prêmios</span>
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
              <span className={`semibold_16 color_white`}>Diretor</span>
              <span className="lr_regular_16 color_gray_500">{director}</span>
            </div>
          )}

          {ratings?.length > 0 && (
            <div className={styles.box_info_film}>
              <span className="semibold_16 color_white">Avaliações</span>

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
