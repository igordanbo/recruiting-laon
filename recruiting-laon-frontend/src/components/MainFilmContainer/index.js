import styles from "./styles.module.css";
import HeaderCatalogContainer from "../HeaderCatalogContainer";
import FooterCatalogContainer from "../FooterCatalogContainer";

export default function MainFilmContainer({ children }) {
  return (
    <section className={styles.main_film_container}>
      <div className={styles.main_film_container_background}></div>
      <HeaderCatalogContainer variant={"single"} />
      <main className={styles.main_container}>{children}</main>
      <FooterCatalogContainer />
    </section>
  );
}
