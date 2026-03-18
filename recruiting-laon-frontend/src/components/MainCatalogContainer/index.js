import styles from "./styles.module.css";
import HeaderCatalogContainer from "../HeaderCatalogContainer";
import FooterCatalogContainer from "../FooterCatalogContainer";

export default function MainCatalogContainer({ variant, children, isDirty }) {
  return (
    <section className={styles.main_catalog_container}>
      {variant === "default" || variant === "single" ? (
        <div className={styles.main_catalog_container_background}></div>
      ) : null}
      <HeaderCatalogContainer variant={variant} isDirty={isDirty} />
      <main className={styles.main_container}>{children}</main>
      <FooterCatalogContainer />
    </section>
  );
}
