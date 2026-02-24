export default function CircleSvg({ variant, onClick }) {
  return (
    <>
      {variant === "back" && (
        <svg
          onClick={onClick}
          width="32"
          height="32"
          viewBox="0 0 32 32"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M13.2187 16.6666L16.7947 20.2426L15.852 21.1853L10.6667 16L15.852 10.8146L16.7947 11.7573L13.2187 15.3333L21.3334 15.3333L21.3334 16.6666L13.2187 16.6666Z"
            fill="white"
          />
          <circle
            cx="16"
            cy="16"
            r="15.5"
            transform="rotate(-180 16 16)"
            stroke="#636177"
          />
        </svg>
      )}

      {variant === "next" && (
        <svg
          onClick={onClick}
          width="32"
          height="32"
          viewBox="0 0 32 32"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <g clip-path="url(#clip0_10_7)">
            <path
              d="M18.7813 15.3334L15.2053 11.7574L16.148 10.8147L21.3333 16L16.148 21.1854L15.2053 20.2427L18.7813 16.6667H10.6666V15.3334H18.7813Z"
              fill="white"
            />
          </g>
          <circle cx="16" cy="16" r="15.5" stroke="#636177" />
          <defs>
            <clipPath id="clip0_10_7">
              <rect
                width="16"
                height="16"
                fill="white"
                transform="translate(8 8)"
              />
            </clipPath>
          </defs>
        </svg>
      )}

      {variant === "up" && (
        <svg
          onClick={onClick}
          style={{ transform: "rotate(270deg)" }}
          width="32"
          height="32"
          viewBox="0 0 32 32"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <g clip-path="url(#clip0_10_7)">
            <path
              d="M18.7813 15.3334L15.2053 11.7574L16.148 10.8147L21.3333 16L16.148 21.1854L15.2053 20.2427L18.7813 16.6667H10.6666V15.3334H18.7813Z"
              fill="white"
            />
          </g>
          <circle cx="16" cy="16" r="15.5" stroke="#636177" />
          <defs>
            <clipPath id="clip0_10_7">
              <rect
                width="16"
                height="16"
                fill="white"
                transform="translate(8 8)"
              />
            </clipPath>
          </defs>
        </svg>
      )}

      {variant === "down" && (
        <svg
          onClick={onClick}
          style={{ transform: "rotate(90deg)" }}
          width="32"
          height="32"
          viewBox="0 0 32 32"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <g clip-path="url(#clip0_10_7)">
            <path
              d="M18.7813 15.3334L15.2053 11.7574L16.148 10.8147L21.3333 16L16.148 21.1854L15.2053 20.2427L18.7813 16.6667H10.6666V15.3334H18.7813Z"
              fill="white"
            />
          </g>
          <circle cx="16" cy="16" r="15.5" stroke="#636177" />
          <defs>
            <clipPath id="clip0_10_7">
              <rect
                width="16"
                height="16"
                fill="white"
                transform="translate(8 8)"
              />
            </clipPath>
          </defs>
        </svg>
      )}

      {variant === "play" && (
        <svg
          onClick={onClick}
          width="32"
          height="32"
          viewBox="0 0 32 32"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          style={{ cursor: "pointer" }}
        >
          <circle cx="16" cy="16" r="15.5" stroke="#636177" />
          <path
            d="M13.5 11.8 
     Q23.5 11 14.2 11.4
     L20.5 15.2 
     Q21.2 16 20.5 16.8
     L14.2 20.6 
     Q13.5 21 13.5 20.2
     Z"
            fill="white"
          />{" "}
        </svg>
      )}

      {variant === "facebook" && (
        <svg
          onClick={onClick}
          width="32"
          height="32"
          viewBox="0 0 32 32"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <circle cx="16" cy="16" r="15.5" stroke="#636177" />
          <g clip-path="url(#clip0_13_74)">
            <path
              d="M17.3333 17H19L19.6666 14.3333H17.3333V13C17.3333 12.3133 17.3333 11.6667 18.6666 11.6667H19.6666V9.42668C19.4493 9.39801 18.6286 9.33334 17.762 9.33334C15.952 9.33334 14.6666 10.438 14.6666 12.4667V14.3333H12.6666V17H14.6666V22.6667H17.3333V17Z"
              fill="white"
            />
          </g>
          <defs>
            <clipPath id="clip0_13_74">
              <rect
                width="16"
                height="16"
                fill="white"
                transform="translate(8 8)"
              />
            </clipPath>
          </defs>
        </svg>
      )}

      {variant === "twitter" && (
        <svg
          onClick={onClick}
          width="32"
          height="32"
          viewBox="0 0 32 32"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <circle cx="16" cy="16" r="15.5" stroke="#636177" />
          <g clip-path="url(#clip0_13_75)">
            <path
              d="M22.7747 11.7707C22.2657 11.9958 21.726 12.1437 21.1734 12.2093C21.7559 11.861 22.1918 11.3127 22.4 10.6667C21.8534 10.992 21.254 11.22 20.6294 11.3433C20.2098 10.8944 19.6536 10.5967 19.0473 10.4964C18.4411 10.3961 17.8187 10.499 17.2769 10.789C16.7351 11.079 16.3043 11.5398 16.0514 12.0999C15.7986 12.6599 15.7379 13.2879 15.8787 13.886C14.7701 13.8304 13.6856 13.5424 12.6956 13.0405C11.7055 12.5385 10.8321 11.834 10.132 10.9727C9.88423 11.3983 9.75401 11.8822 9.7547 12.3747C9.7547 13.3413 10.2467 14.1953 10.9947 14.6953C10.552 14.6814 10.1191 14.5619 9.73204 14.3467V14.3813C9.73217 15.0251 9.95495 15.6491 10.3626 16.1474C10.7703 16.6457 11.3377 16.9877 11.9687 17.1153C11.5578 17.2267 11.1269 17.2431 10.7087 17.1633C10.8866 17.7175 11.2334 18.2021 11.7004 18.5494C12.1675 18.8967 12.7315 19.0892 13.3134 19.1C12.735 19.5542 12.0728 19.89 11.3646 20.0881C10.6564 20.2863 9.91612 20.3428 9.18604 20.2547C10.4605 21.0743 11.9441 21.5094 13.4594 21.508C18.588 21.508 21.3927 17.2593 21.3927 13.5747C21.3927 13.4547 21.3894 13.3333 21.384 13.2147C21.9299 12.8201 22.4011 12.3314 22.7754 11.7713L22.7747 11.7707Z"
              fill="white"
            />
          </g>
          <defs>
            <clipPath id="clip0_13_75">
              <rect
                width="16"
                height="16"
                fill="white"
                transform="translate(8 8)"
              />
            </clipPath>
          </defs>
        </svg>
      )}

      {variant === "youtube" && (
        <svg
          onClick={onClick}
          width="32"
          height="32"
          viewBox="0 0 32 32"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <circle cx="16" cy="16" r="15.5" stroke="#636177" />
          <g clip-path="url(#clip0_13_226)">
            <path
              d="M22.3619 12.332C22.6666 13.52 22.6666 16 22.6666 16C22.6666 16 22.6666 18.48 22.3619 19.668C22.1926 20.3247 21.6973 20.8413 21.0699 21.016C19.9306 21.3333 15.9999 21.3333 15.9999 21.3333C15.9999 21.3333 12.0713 21.3333 10.9299 21.016C10.2999 20.8387 9.80525 20.3227 9.63792 19.668C9.33325 18.48 9.33325 16 9.33325 16C9.33325 16 9.33325 13.52 9.63792 12.332C9.80725 11.6753 10.3026 11.1587 10.9299 10.984C12.0713 10.6667 15.9999 10.6667 15.9999 10.6667C15.9999 10.6667 19.9306 10.6667 21.0699 10.984C21.6999 11.1613 22.1946 11.6773 22.3619 12.332ZM14.6666 18.3333L18.6666 16L14.6666 13.6667V18.3333Z"
              fill="white"
            />
          </g>
          <defs>
            <clipPath id="clip0_13_226">
              <rect
                width="16"
                height="16"
                fill="white"
                transform="translate(8 8)"
              />
            </clipPath>
          </defs>
        </svg>
      )}
    </>
  );
}
