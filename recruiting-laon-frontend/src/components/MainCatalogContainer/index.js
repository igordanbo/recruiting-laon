import styles from "./styles.module.css";
import HeaderCatalogContainer from "../HeaderCatalogContainer";
import FooterCatalogContainer from "../FooterCatalogContainer";

export default function MainCatalogContainer({ children }) {
  return (
    <section className={styles.main_catalog_container}>
      <div className={styles.main_catalog_container_background}></div>
      <HeaderCatalogContainer variant={"catalog"} />
      <main className={styles.main_container}>{children}</main>
      <FooterCatalogContainer />
    </section>
  );
}
