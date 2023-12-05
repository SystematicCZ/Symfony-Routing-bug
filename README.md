# Symfony routing bug

Route for controller B has priority set:

```php
    #[Route(path:  '/b', name: 'b_method', priority: 9999)]
    public function bMethodOne(): Response
```

When the prefix in `routes.yaml` is commented out, the routing priority works as expected. The `bin/console debug:router` command outputs the following:

```bash
❯ bin/console debug:router
 ---------------- -------- -------- ------ -------------------------- 
  Name             Method   Scheme   Host   Path                      
 ---------------- -------- -------- ------ -------------------------- 
  b_method         ANY      ANY      ANY    /b                        
  _preview_error   ANY      ANY      ANY    /_error/{code}.{_format}  
  a_method         ANY      ANY      ANY    /a                        
 ---------------- -------- -------- ------ -------------------------- 
```

However, when the prefix is set, the routing priority seems to be lost. The `bin/console debug:router` command then shows a different order:

```bash
❯ bin/console debug:router
 ---------------- -------- -------- ------ -------------------------- 
  Name             Method   Scheme   Host   Path                      
 ---------------- -------- -------- ------ -------------------------- 
  _preview_error   ANY      ANY      ANY    /_error/{code}.{_format}  
  a_method.cs      ANY      ANY      ANY    /a                        
  a_method.en      ANY      ANY      ANY    /en/a                     
  b_method.cs      ANY      ANY      ANY    /b                        
  b_method.en      ANY      ANY      ANY    /en/b                     
 ---------------- -------- -------- ------ -------------------------- 
```
