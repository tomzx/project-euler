total = 0
(1..1000).each {
  |x| 
  total += x ** x
}
print total