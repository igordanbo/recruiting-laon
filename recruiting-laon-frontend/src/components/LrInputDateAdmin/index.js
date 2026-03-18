import styles from "./styles.module.css";

export default function LrInputDateAdmin({
  placeholder = "Insira o campo",
  label,
  name,
  value,
  onChange,
  className,
  error,
}) {
  function handleChange(e) {
    let v = e.target.value;

    // remove tudo que não for número
    v = v.replace(/\D/g, "");

    // limita 8 números
    if (v.length > 8) v = v.slice(0, 8);

    // aplica máscara
    if (v.length > 4) {
      v = v.replace(/(\d{2})(\d{2})(\d+)/, "$1/$2/$3");
    } else if (v.length > 2) {
      v = v.replace(/(\d{2})(\d+)/, "$1/$2");
    }

    onChange({
      target: {
        name,
        value: v,
      },
    });
  }

  return (
    <div
      className={`${styles.lr_input_text_container} ${
        error ? styles.error : ""
      }`}
    >
      <label className={styles.lr_input_text_label}>{label}</label>

      <input
        className={`${styles.lr_input_text} ${className || ""}`}
        type="text"
        inputMode="numeric"
        placeholder={placeholder}
        name={name}
        value={value}
        onChange={handleChange}
        maxLength={10}
      />

      {error && <span className={styles.lr_input_error}>{error}</span>}
    </div>
  );
}