import useLocalStorage from './useLocalStorage';

const useAuthorisationService = () => {
  const { getPermissions } = useLocalStorage();

  const can = (permission, permissions = null) => {
    let perms;

    if (!permissions) {
      perms = getPermissions();
    } else {
      perms = permissions;
    }

    if (!perms) {
      return false;
    }

    return perms.includes(permission);
  };

  return { can };
};

export default useAuthorisationService;
