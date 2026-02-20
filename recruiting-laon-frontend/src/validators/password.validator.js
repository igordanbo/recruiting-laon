export function validatePassword(password) {
  if (!password) return false;

  const trimmedPassword = password.trim();

  if (trimmedPassword.length < 6) return false;
  if (trimmedPassword.length > 255) return false;

  return true;
}
