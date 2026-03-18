import styles from "./styles.module.css";

export default function LrSelectAdmin({
  placeholder = "Selecione uma opção",
  options = [],
  label,
  name,
  value,
  onChange,
  className,
}) {
  return (
    <div className={styles.lr_select_container}>
      <label className={styles.lr_select_label}>{label}</label>

      <select
        className={`${styles.lr_select} ${className || ""}`}
        name={name}
        value={value || ""}
        onChange={onChange}
      >
        <option value="">{placeholder}</option>

        {options.map((option) => (
          <option key={option.value} value={option.value}>
            {option.label}
          </option>
        ))}
      </select>
    </div>
  );
}
