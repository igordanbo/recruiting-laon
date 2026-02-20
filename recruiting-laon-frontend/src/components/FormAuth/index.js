import styles from "./styles.module.css";

export default function FormAuth({ title, subtitle, onSubmit, children }) {
  return (
    <form className={styles.form_auth} onSubmit={onSubmit}>
      <div className={styles.form_auth_header}>
        <h2 className="lr_semibold_24 color_white">{title}</h2>
        <p className="lr_regular_16 color_gray_500">{subtitle}</p>
      </div>
      <div className={styles.form_auth_main}>{children}</div>
    </form>
  );
}
