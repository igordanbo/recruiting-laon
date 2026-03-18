import styles from "./styles.module.css";

export default function LrButtonSecondary({
  variant = "default",
  onClick,
  type,
  title,
  text,
  disabled,
  adicionalClassName,
}) {
  return (
    <button
      onClick={onClick}
      title={title}
      type={type}
      {...((variant === "small" && {
        className: `${styles.lr_button_secondary_small} ${adicionalClassName || ""}`,
      }) ||
        (variant === "default" && {
          className: `${styles.lr_button_secondary} ${adicionalClassName || ""}`,
        }))}
      disabled={disabled}
    >
      {text}
    </button>
  );
}
