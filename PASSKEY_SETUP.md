# Passkey (WebAuthn) Setup Guide for Linux

## Overview
Passkeys provide passwordless authentication using biometrics or security keys. On Linux, support depends on your hardware and configuration.

## Prerequisites

### For CachyOS / Arch Linux

1. **Install Required Packages**:
```bash
# Install libfido2 for hardware security keys
sudo pacman -S libfido2

# Install pam-u2f if using U2F devices
sudo pacman -S pam-u2f

# Install opensc for smart card support
sudo pacman -S opensc

    Configure Browser Support:

        Firefox: Enable security.webauth.u2f in about:config

        Chrome/Chromium: WebAuthn is enabled by default

    For Hardware Security Keys:

bash

# Check if your key is detected
lsusb | grep -i "yubikey\|feitian\|token"

# Test with libfido2
fido2-token -L

Alternative: Password Manager Passkeys

If hardware passkeys aren't working, use a password manager:

    Bitwarden: Supports passkeys in desktop app

    1Password: Full passkey support across platforms

    KeePassXC: WebAuthn support with browser extension

Testing Passkeys

    Online Test: https://webauthn.io/

    Demo Site: https://demo.yubico.com/webauthn

Troubleshooting
Issue: "No passkey device found"

    Ensure your security key is plugged in

    Check if the key is recognized: lsusb

    Try different USB port

Issue: Browser doesn't support WebAuthn

    Update to latest browser version

    Enable experimental WebAuthn features

    Try Chrome/Chromium instead of Firefox

Issue: Passkey works but not in application

    Ensure you're using HTTPS (localhost works)

    Check console for WebAuthn errors

    Verify the site is in the allowed origins list

For Development

If passkeys don't work in development:

    Use HTTPS locally:

bash

# Generate self-signed certificate
openssl req -x509 -newkey rsa:4096 -keyout key.pem -out cert.pem -days 365 -nodes

# Configure Symfony to use HTTPS in .env
APP_ENV=dev
APP_DEBUG=1

    Fallback Authentication:
    The system automatically falls back to password authentication when passkeys are unavailable.

Support

If passkeys still don't work, contact the system administrator or use traditional email/password login.
