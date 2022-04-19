 
// Config object to be passed to Msal on creation.
// For a full list of msal.js configuration parameters, 
// visit https://azuread.github.io/microsoft-authentication-library-for-js/docs/msal/modules/_authenticationparameters_.html
const msalConfig = {
  auth: {
    clientId: "3c7ac775-e5d7-4e16-a31c-2ee8abd5175a",
    authority: "https://login.microsoftonline.com/db992bae-4cb3-4086-8c91-55255b0c39fe",
    knownAuthorities: [],
    redirectUri: "https://sybawebsite.azurewebsites.net",
    postLogoutRedirectUri: "https://sybawebsite.azurewebsites.net/logout",
    navigateToLoginRequestUrl: true,
  },
  cache: {
    cacheLocation: "sessionStorage", // This configures where your cache will be stored
    storeAuthStateInCookie: false, // Set this to "true" if you are having issues on IE11 or Edge
  }
};  
  
// Add here the scopes to request when obtaining an access token for MS Graph API
// for more, visit https://github.com/AzureAD/microsoft-authentication-library-for-js/blob/dev/lib/msal-core/docs/scopes.md
const loginRequest = {
  scopes: ["openid", "profile", "User.Read"]
};

// Add here scopes for access token to be used at MS Graph API endpoints.
const tokenRequest = {
  scopes: ["Mail.Read"]
};