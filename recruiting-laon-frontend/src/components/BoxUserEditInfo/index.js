import styles from "./styles.module.css";
export default function BoxUserEditInfo({ title, description, children }) {
  return (
    <div className={styles.box_user_edit_info}>
      <div className={styles.header_user_edit_info}>
        <p className="lr_semibold_24 color_white">{title}</p>
        <p className="lr_regular_16 color_gray_500">{description}</p>
      </div>

      <div className={styles.grid_user_edit_info}>{children}</div>
    </div>
  );
}
