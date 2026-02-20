import styles from "./styles.module.css";

export default function LrInputText({
  type = "text",
  placeholder = "Insira o campo",
  name,
  value,
  onChange,
  className,
}) {
  return (
    <input
      className={`${styles.lr_input_text} ${className || ""}`}
      type={type}
      placeholder={placeholder}
      name={name}
      value={value}
      onChange={onChange}
    />
  );
}
