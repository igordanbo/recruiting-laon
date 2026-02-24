import styles from "./styles.module.css";

export default function FilmSlider({ films = [] }) {
  return (
    <div className={styles.slider_wrapper}>
        <p  className="lr_semibold_16 color_white mb-2">Em breve</p>
      <div className={styles.slider}>
        {films.map((film) => (
          <div key={film.id} className={styles.card}>
            <img src={film.image_url} alt={film.title} />
          </div>
        ))}
      </div>
    </div>
  );
}
