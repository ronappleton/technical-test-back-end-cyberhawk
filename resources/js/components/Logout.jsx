import { useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import useAuthenticationService from '../hooks/services/useAuthenticationService';

const Logout = ({ setLoggedIn, setPermissions }) => {
  const navigate = useNavigate();
  const { logout } = useAuthenticationService();

  useEffect(() => {
    logout().then(() => {
      setLoggedIn(false);
      setPermissions(null);
      navigate('/login', { replace: true });
    });
  }, []);
};

export default Logout;
