import { Outlet, useNavigate } from "react-router-dom";
import { useState } from "react";
import MainCatalogContainer from "../../components/MainCatalogContainer";

export default function TemplateCatalog({ variant = "default" }) {
  const [isDirty, setIsDirty] = useState(false);

  return (
    <MainCatalogContainer variant={variant} isDirty={isDirty}>
      <Outlet context={{ setIsDirty }} />
    </MainCatalogContainer>
  );
}