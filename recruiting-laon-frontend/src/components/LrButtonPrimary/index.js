import styles from "./styles.module.css";

export default function LrButtonPrimary({ onClick, title, text, disabled }) {
  return (
        <button
          onClick={onClick}
          title={title}
          className={`width_100 ${styles.lr_button_primary}`}
          disabled={disabled}
        >
          {text}
        </button>
  );
}
