import LrButtonPrimary from "../LrButtonPrimary";
import LrButtonSecondary from "../LrButtonSecondary";
import styles from "./styles.module.css";

export default function Modal({
  onClickClose,
  onClickBtnSec,
  onClickBtnPri,
  titleBtnSec,
  titleBtnPri,
  title,
  type = "default",
  children,
}) {
  return (
    <div className={styles.modal_overlay} onClick={onClickClose}>
      <div className={`${styles.modal_content} ${styles[type]}`}>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          height="64px"
          viewBox="0 -960 960 960"
          width="64px"
          fill={
            type === "danger"
              ? "#ff4d4f"
              : type === "info"
                ? "#1890ff"
                : type === "success"
                  ? "#52c41a"
                  : type === "warning"
                    ? "#faad14"
                    : "#fff"
          }
        >
          <path d="M440-280h80v-240h-80v240Zm68.5-331.5Q520-623 520-640t-11.5-28.5Q497-680 480-680t-28.5 11.5Q440-657 440-640t11.5 28.5Q463-600 480-600t28.5-11.5ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </svg>

        <h2 className={styles.modal_title}>{title}</h2>

        {children}

        <div
          className={`width_100 display_flex gap_16 align_items_center justify_content_center`}
        >
          <LrButtonSecondary
            title={titleBtnSec}
            text={titleBtnSec}
            adicionalClassName={`width_max_content`}
            variant={`small`}
            onClick={onClickBtnSec}
          />

          <LrButtonPrimary
            title={titleBtnPri}
            text={titleBtnPri}
            adicionalClassName={`width_max_content`}
            variant={`small`}
            onClick={onClickBtnPri}
          />
        </div>
      </div>
    </div>
  );
}
