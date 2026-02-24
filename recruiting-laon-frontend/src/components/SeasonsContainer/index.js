import { useState } from "react";
import styles from "./styles.module.css";
import CircleSvg from "../CircleSvg";

export default function SeasonsContainer({ serie }) {
  const [openSeason, setOpenSeason] = useState(null);

  const toggleSeason = (seasonId) => {
    setOpenSeason(openSeason === seasonId ? null : seasonId);
  };

  return (
    <div className={styles.container}>
      <h2 className={`lr_semibold_40 color_white`}>Temporadas</h2>

      {serie.seasons?.map((season) => (
        <div key={season.id} className={styles.seasonCard}>
          {/* Header da temporada */}
          <div
            className={styles.seasonHeader}
            onClick={() => toggleSeason(season.id)}
          >
            <h3>
              {season.title} ({season.year})
            </h3>
            <span className={styles.arrow}>
              {openSeason === season.id ? (
                <CircleSvg variant={"up"} />
              ) : (
                <CircleSvg variant={"down"} />
              )}
            </span>
          </div>

          <div
            className={`${styles.episodesContainer} ${
              openSeason === season.id ? styles.open : ""
            }`}
          >
            {season.episodes?.map((episode) => (
              <div key={episode.id} className={styles.episodeCard}>
                <div className={styles.episodeInfo}>
                  <strong>
                    {episode.episode_number}. {episode.title}
                  </strong>
                  <p>Duração: {episode.duration} min</p>
                  <p className={styles.synopsis}>{episode.synopsis}</p>
                </div>

                <CircleSvg
                  variant={"play"}
                  onClick={() => window.open(episode.video_url, "_blank")}
                />
              </div>
            ))}
          </div>
        </div>
      ))}
    </div>
  );
}
