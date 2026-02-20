import styles from "./styles.module.css";
import HeaderAuthContainer from "../HeaderAuthContainer";

export default function MainAuthContainer({ children }) {
  return (
    <section className={styles.main_auth_container}>
      <HeaderAuthContainer />
      <main className={styles.main_container}>{children}</main>
    </section>
  );
}
