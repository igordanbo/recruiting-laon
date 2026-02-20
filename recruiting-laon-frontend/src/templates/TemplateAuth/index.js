import { Outlet } from "react-router-dom";
import MainAuthContainer from "../../components/MainAuthContainer";

export default function TemplateAuth() {
  return (
    <div>
      <MainAuthContainer>
        <Outlet />
      </MainAuthContainer>
    </div>
  );
}
