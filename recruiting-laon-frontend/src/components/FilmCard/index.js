import { useState } from "react";
import styles from "./styles.module.css";

export default function FilmCard({ film, onClick }) {
  const [loaded, setLoaded] = useState(false);

  return (
    <div onClick={onClick} className={styles.tumb_film_card}>
      <img
        src={film?.image_url}
        alt={film?.title}
        loading="lazy"
        onLoad={() => setLoaded(true)}
        onError={() => setLoaded(true)}
        className={`card_img img-fluid ${styles.image} ${
          loaded ? styles.loaded : ""
        }`}
      />

      {!loaded && <div className={styles.skeleton} />}

      <div className={styles.film_info_hover}>
        <span className={styles.film_name}>{film?.title}</span>
        <span className={styles.film_play_badge}>Assistir</span>
      </div>
    </div>
  );
}
