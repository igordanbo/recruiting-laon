import { Link } from "react-router-dom";
import styles from "./styles.module.css";

export default function ContainerLeftSingleFilm({ src, to, linkText }) {
  return (
    <div className={` ${styles.container_left_single_film}`}>
      <img src={src} />
      <Link to={to} target="_blank" className={`${styles.link_left_single_film}`}>
        {linkText}
      </Link>
    </div>
  );
}
