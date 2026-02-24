import styles from "./styles.module.css";

export default function LrButtonBasic({
  className,
  type,
  onClick,
  title,
  text,
}) {
  return (
    <button
      onClick={onClick}
      title={title}
      type={type}
      className={`width_100 ${styles.lr_button_basic} ${className}`}
    >
      {text}
    </button>
  );
}
