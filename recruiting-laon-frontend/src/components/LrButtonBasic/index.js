import styles from "./styles.module.css";

export default function LrButtonBasic({ onClick, title, text }) {
  return (
    <button
      onClick={onClick}
      title={title}
      className={`width_100 ${styles.lr_button_basic}`}
    >
      {text}
    </button>
  );
}
