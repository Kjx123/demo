# git的基本操作

## 修改完文件

### 1.查看仓库状态
``` shell
git status

```

### 2.添加修改
``` shell
git add -A

```

### 3.添加修改说明
``` shell
git commit -m '修改说明'

```

### 4.提交
``` shell
git push

```

## 合并的命令
如果**只有**修改文件，**没有**新增文件，可以直接使用以下命令
``` shell
git commit -am '只有修改，没有新增'
git push

```

测试一下