export function validateName(name) {
  if (!name) return false;

  const trimmedName = name.trim();

  if (trimmedName.length < 3) return false;
  if (trimmedName.length > 255) return false;

  return true;
}
