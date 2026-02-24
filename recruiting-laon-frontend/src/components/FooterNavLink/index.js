import { Link } from "react-router-dom";
import styles from "./styles.module.css";

export default function FooterNavLink({ to, text }) {
  return (
    <Link to={to} className={`color_gray_500 lr_regular_14 ${styles.lr_footer_nav_link}`}>
      {text}
    </Link>
  );
}
