import styles from "./styles.module.css";

export default function Loader() {
  return (
    <div className={styles.loader_container}>
      <div className={`${styles.spinner} ${styles.center}`}>
        <div className={`${styles.spinner_blade}`}></div>
        <div className={`${styles.spinner_blade}`}></div>
        <div className={`${styles.spinner_blade}`}></div>
        <div className={`${styles.spinner_blade}`}></div>
        <div className={`${styles.spinner_blade}`}></div>
        <div className={`${styles.spinner_blade}`}></div>
        <div className={`${styles.spinner_blade}`}></div>
        <div className={`${styles.spinner_blade}`}></div>
        <div className={`${styles.spinner_blade}`}></div>
        <div className={`${styles.spinner_blade}`}></div>
        <div className={`${styles.spinner_blade}`}></div>
        <div className={`${styles.spinner_blade}`}></div>
      </div>
    </div>
  );
}
