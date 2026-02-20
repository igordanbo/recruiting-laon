import { Link } from "react-router-dom";
import styles from "./styles.module.css";

export default function LrLinkSecondary({ to, text }) {
  return (
    <Link to={to} className={`width_100 ${styles.lr_link_secondary}`}>
      {text}
    </Link>
  );
}
