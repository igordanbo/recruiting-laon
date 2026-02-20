import styles from "./styles.module.css";
import HeaderCatalogContainer from "../HeaderCatalogContainer";

export default function MainCatalogContainer({ children }) {
  return (
    <section className={styles.main_catalog_container}>
      <HeaderCatalogContainer />
      <main className={styles.main_container}>{children}</main>
    </section>
  );
}
