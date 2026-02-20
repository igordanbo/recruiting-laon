import { Outlet } from "react-router-dom";
import MainCatalogContainer from "../../components/MainCatalogContainer";

export default function TemplateCatalog() {
  return (
    <div>
      <MainCatalogContainer>
        <Outlet />
      </MainCatalogContainer>
    </div>
  );
}
